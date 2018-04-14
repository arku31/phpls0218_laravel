<?php
namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection
{
    public function collection()
    {
        return Post::where('id', 1)->get();
    }
}