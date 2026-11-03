<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\MemberResource;

class MemberController extends Controller
{
public function index()
{
    $members = Member::paginate(10);

    return MemberResource::collection($members);
}

public function show(string $id)
{
    $member = Member::findOrFail($id);

    return new MemberResource($member);
}

}
