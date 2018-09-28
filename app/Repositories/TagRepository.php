<?php
namespace App\Repositories;



use App\Tag;

class TagRepository
{

    /**
     * @param $tagName
     * @return array
     * @internal param $data
     * @internal param array $associated
     */
    public function filter ($tagName)
    {
        return Tag::Where('tagName', 'like', '%' . $tagName. '%')->get();

    }

}
