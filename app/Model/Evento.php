<?php

class Evento
{

    public function __construct()
    {
        $this->db = new Base();
    }

    public function ObtenerEventos()
    {

        $this->db->query("SELECT * FROM eventos");
        $Eventos = $this->db->getAll();

        return $Eventos;
    }

    public function CreateEvent($data)
    {
        $this->db->query("INSERT INTO eventos (title,Description,start,end) VALUES (:title,:Descp,:st,:en)");
        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":Descp", $data["Description"]);
        $this->db->bind(":st", $data["start"]);
        $this->db->bind(":en", $data["end"]);

        if ($this->db->execQuery()) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateEvent($id, $data)
    {

        $this->db->query("UPDATE eventos SET title=:title,Description=:Description,start=:start,end=:end WHERE id=:id");
        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":Description", $data["Description"]);
        $this->db->bind(":start", $data["start"]);
        $this->db->bind(":end", $data["end"]);
        $this->db->bind(":id", $id);

        if ($this->db->execQuery()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteEvent($id)
    {
        $this->db->query("DELETE FROM eventos WHERE id=:id");
        $this->db->bind(":id", $id);

        if ($this->db->execQuery()) {
            return true;
        } else {
            return false;
        }
    }
}
