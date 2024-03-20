<?php

namespace App\Hateoas;

use App\Models\Stand;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class StandHateoas
{
    use CreatesLinks;

    public function self(Stand $stand): ?Link
    {
        if($stand->deleted_at) {
            return null;
        }

        return $this->link('stand.show', ['stand' => $stand]);
    }

    public function update(Stand $stand): ?Link
    {
        if($stand->deleted_at) {
            return null;
        }

        return $this->link('stand.update', ['stand' => $stand]);
    }

    public function delete(Stand $stand): ?Link
    {
        if($stand->deleted_at) {
            return null;
        }

        return $this->link('stand.destroy', ['stand' => $stand]);
    }

    public function restore(Stand $stand): ?Link
    {
        if(empty($stand->deleted_at)) {
            return null;
        }

        return $this->link('stand.restore', ['stand' => $stand]);
    }

    public function forceDelete(Stand $stand): ?Link
    {
        if(empty($stand->deleted_at)) {
            return null;
        }

        return $this->link('stand.forceDelete', ['stand' => $stand]);
    }
}
