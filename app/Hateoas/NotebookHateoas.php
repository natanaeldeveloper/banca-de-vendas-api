<?php

namespace App\Hateoas;

use App\Models\Notebook;
use GDebrauwer\Hateoas\Link;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class NotebookHateoas
{
    use CreatesLinks;

    public function self(Notebook $notebook): ?Link
    {
        return $this->link('notebook.show', ['stand' => $notebook->stand_id, 'notebook' => $notebook]);
    }

    public function update(Notebook $notebook): ?Link
    {
        return $this->link('notebook.update', ['stand' => $notebook->stand_id, 'notebook' => $notebook]);
    }

    public function delete(Notebook $notebook): ?Link
    {
        return $this->link('notebook.destroy', ['stand' => $notebook->stand_id, 'notebook' => $notebook]);
    }
}
