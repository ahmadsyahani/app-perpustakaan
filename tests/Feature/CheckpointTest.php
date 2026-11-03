<?php
namespace Tests\Feature;

use App\Models\{Book, Category, Loan, Member, User};
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{Hash, Http};
use Tests\TestCase;

class CheckpointTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Http::preventStrayRequests();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_seed_and_authentication_role_profile_and_password(): void
    {
        $this->assertDatabaseCount('books', 20);
        $this->assertDatabaseCount('members', 15);
        $this->assertDatabaseCount('loans', 10);
        $this->get('/books')->assertRedirect('/login');
        $this->post('/login', ['email'=>'admin@pens.ac.id','password'=>'wrong'])->assertSessionHasErrors('email');
        $this->post('/login', ['email'=>'admin@pens.ac.id','password'=>'password'])->assertRedirect('/books');
        $admin=User::where('email','admin@pens.ac.id')->firstOrFail();
        $this->assertAuthenticatedAs($admin);
        $this->get('/categories')->assertOk();
        $this->get('/profil')->assertOk()->assertSee($admin->name);
        $this->from('/profil')->put('/profil/password', ['current_password'=>'wrong','password'=>'new-password','password_confirmation'=>'new-password'])->assertSessionHasErrors('current_password');
        $this->from('/profil')->put('/profil/password', ['current_password'=>'password','password'=>'new-password','password_confirmation'=>'new-password'])->assertRedirect('/profil')->assertSessionHasNoErrors();
        $this->assertTrue(Hash::check('new-password',$admin->fresh()->password));
        $this->post('/logout')->assertRedirect('/login');
        $this->assertGuest();
        $this->post('/login', ['email'=>'petugas1@pens.ac.id','password'=>'password'])->assertRedirect('/');
        $this->get('/categories')->assertForbidden();
        $this->get('/books')->assertOk()->assertDontSee('href="'.route('categories.index').'"',false);
    }

    public function test_web_crud_pages_and_loan_lifecycle(): void
    {
        $user=User::first(); $this->actingAs($user);
        foreach (['books','members','categories'] as $resource) {
            $this->get('/'.$resource)->assertOk();
            $this->get('/'.$resource.'/create')->assertOk();
            $this->get('/'.$resource.'/1/edit')->assertOk();
        }
        foreach (['books','members','loans'] as $resource) $this->get('/'.$resource.'/1')->assertOk();
        $this->get('/loans/create')->assertOk()->assertDontSee('name="user_id"',false);
        $data=['member_id'=>Member::first()->id,'user_id'=>999999,'tanggal_pinjam'=>'2026-11-01','tanggal_kembali'=>'2026-11-08','book_ids'=>[Book::first()->id]];
        $this->post('/loans',$data)->assertRedirect('/loans');
        $loan=Loan::latest('id')->first();
        $this->assertEquals($user->id,$loan->user_id);
        $this->assertEquals(1,$loan->loanItems()->count());
        $this->get('/loans/'.$loan->id.'/edit')->assertOk();
        $this->put('/loans/'.$loan->id,['tanggal_pinjam'=>'2000-01-01','tanggal_kembali'=>'2026-10-01','status'=>'dipinjam'])->assertSessionHasErrors('tanggal_kembali');
        $this->put('/loans/'.$loan->id.'/kembalikan')->assertRedirect('/loans');
        $this->assertEquals('dikembalikan',$loan->fresh()->status);
        $this->assertNotNull($loan->fresh()->tanggal_dikembalikan);
        $this->delete('/loans/'.$loan->id)->assertRedirect('/loans');
        $this->assertDatabaseMissing('loan_items',['loan_id'=>$loan->id]);
    }

    public function test_web_books_categories_members_crud_and_dependencies(): void
    {
        $this->actingAs(User::first());
        $this->post('/categories',['nama_kategori'=>'Kategori Uji','deskripsi'=>'Uji CRUD'])->assertRedirect('/categories');
        $category=Category::where('nama_kategori','Kategori Uji')->firstOrFail();
        $this->put('/categories/'.$category->id,['nama_kategori'=>'Kategori Diperbarui'])->assertRedirect('/categories');
        $book=['judul'=>'Buku Web','penulis'=>'Penulis','penerbit'=>'Penerbit','tahun_terbit'=>2025,'stok'=>3,'category_id'=>$category->id];
        $this->post('/books',$book)->assertRedirect('/books');
        $record=Book::where('judul','Buku Web')->firstOrFail();
        $this->get('/books/'.$record->id.'/edit')->assertOk()->assertSee('Buku Web');
        $book['judul']='Buku Web Diperbarui';
        $this->put('/books/'.$record->id,$book)->assertRedirect('/books');
        $this->assertDatabaseHas('books',['id'=>$record->id,'judul'=>'Buku Web Diperbarui']);
        $this->delete('/categories/'.$category->id)->assertSessionHasErrors('delete');
        $this->delete('/books/'.$record->id)->assertRedirect('/books');
        $this->delete('/categories/'.$category->id)->assertRedirect('/categories');
        $member=['nama'=>'Anggota Uji','nim'=>'TEST123','email'=>'uji@example.test','nomor_telepon'=>'08123456789','alamat'=>'Surabaya','status'=>'aktif'];
        $this->post('/members',$member)->assertRedirect('/members');
        $record=Member::where('nim','TEST123')->firstOrFail();
        $member['nama']='Anggota Diperbarui';
        $this->put('/members/'.$record->id,$member)->assertRedirect('/members');
        $this->assertDatabaseHas('members',['id'=>$record->id,'nama'=>'Anggota Diperbarui']);
        $this->delete('/members/'.$record->id)->assertRedirect('/members');
        $this->assertDatabaseMissing('members',['id'=>$record->id]);
    }

    public function test_all_eleven_api_endpoints_and_validation(): void
    {
        $book=Book::first(); $member=Member::first();
        $this->getJson('/api/books?judul='.urlencode($book->judul).'&category_id='.$book->category_id)->assertOk()->assertJsonStructure(['data','links','meta']);
        $this->getJson('/api/books/'.$book->id)->assertOk()->assertJsonPath('data.category.id',$book->category_id);
        $this->getJson('/api/books/999999')->assertNotFound();
        $this->postJson('/api/books',[])->assertUnprocessable();
        $data=['judul'=>'Buku Uji API','penulis'=>'Penulis Uji','penerbit'=>'Penerbit Uji','tahun_terbit'=>2025,'isbn'=>'9780000000001','stok'=>2,'category_id'=>$book->category_id];
        $id=$this->postJson('/api/books',$data)->assertCreated()->json('data.id');
        $this->postJson('/api/books',$data)->assertUnprocessable()->assertJsonValidationErrors('isbn');
        $data['judul']='Buku Diubah';
        $this->putJson('/api/books/'.$id,$data)->assertOk()->assertJsonPath('data.judul','Buku Diubah');
        $this->deleteJson('/api/books/'.$id)->assertOk();
        $this->getJson('/api/members')->assertOk()->assertJsonCount(10,'data');
        $this->getJson('/api/members/'.$member->id)->assertOk()->assertJsonPath('data.id',$member->id);
        $this->getJson('/api/loans')->assertOk()->assertJsonStructure(['data'=>[['member','petugas','books']],'meta']);
        $loan=['member_id'=>$member->id,'user_id'=>User::first()->id,'tanggal_pinjam'=>'2026-11-01','tanggal_kembali'=>'2026-11-08','book_ids'=>[$book->id]];
        $this->postJson('/api/loans',[])->assertUnprocessable();
        $id=$this->postJson('/api/loans',$loan)->assertCreated()->assertJsonPath('data.status','dipinjam')->json('data.id');
        $this->putJson('/api/loans/'.$id.'/kembalikan')->assertOk()->assertJsonPath('data.status','dikembalikan');
        $this->getJson('/api/stats')->assertOk()->assertJsonPath('total_buku',20)->assertJsonPath('total_anggota',15)->assertJsonPath('peminjaman_aktif',Loan::where('status','dipinjam')->count());
    }

    public function test_dashboard_report_consume_api_and_handle_failures(): void
    {
        $this->actingAs(User::first());
        Http::fake(['*/api/stats'=>Http::response(['total_buku'=>20,'total_anggota'=>15,'peminjaman_aktif'=>3]),'*/api/loans*'=>Http::response(['data'=>[],'meta'=>['current_page'=>2,'last_page'=>3]])]);
        $this->get('/')->assertOk()->assertSee('20');
        $this->get('/loans/report?page=2')->assertOk()->assertSee('Halaman 2 dari 3');
        Http::assertSent(fn ($request) => str_contains($request->url(),'/api/loans') && $request['page']==2);
        Http::fake(['*'=>Http::response([],500)]);
        $this->get('/')->assertOk();
        $this->get('/loans/report')->assertOk();
        Http::fake(['*'=>Http::failedConnection()]);
        $this->get('/')->assertOk();
        $this->get('/loans/report')->assertOk();
    }
}
