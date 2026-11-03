<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $memberIds = Member::pluck('id');
        $userIds = User::pluck('id');
        $bookIds = Book::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            $tanggalPinjam = now()->subDays(fake()->numberBetween(1, 30));
            $tanggalKembali = $tanggalPinjam->copy()->addDays(7);
            $status = fake()->randomElement(['dipinjam', 'dikembalikan', 'dikembalikan', 'terlambat']);

            if ($status === 'dipinjam') {
                $tanggalPinjam = now()->subDays(fake()->numberBetween(0, 6));
                $tanggalKembali = $tanggalPinjam->copy()->addDays(7);
            } elseif ($status === 'terlambat') {
                $tanggalPinjam = now()->subDays(fake()->numberBetween(8, 30));
                $tanggalKembali = $tanggalPinjam->copy()->addDays(7);
            }

            $loan = Loan::create([
                'member_id' => $memberIds->random(),
                'user_id' => $userIds->random(),
                'tanggal_pinjam' => $tanggalPinjam->toDateString(),
                'tanggal_kembali' => $tanggalKembali->toDateString(),
                'tanggal_dikembalikan' => $status === 'dikembalikan'
                    ? $tanggalPinjam->copy()->addDays(fake()->numberBetween(0, min(7, (int) $tanggalPinjam->diffInDays(now()))))->toDateString()
                    : null,
                'status' => $status,
            ]);

            $bookIds->random(fake()->numberBetween(1, min(3, $bookIds->count())))
                ->each(fn ($bookId) => $loan->loanItems()->create(['book_id' => $bookId]));
        }
    }
}
