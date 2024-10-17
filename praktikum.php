<?php

# membuat class Animal
class Animal
{
    # properti animals
    public $animals = [];

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data) {
        $this->animals = $data;
    }

    # method index - menampilkan data animals
    public function index() {
        if (empty($this->animals)) {
            echo "Tidak ada hewan dalam daftar.<br>";
        } else {
            foreach ($this->animals as $index => $animal) {
                echo ($index + 1) . ". " . $animal . "<br>";
            }
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data) {
        array_push($this->animals, $data);
        echo "Hewan baru telah ditambahkan: $data<br>";
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data) {
        if (isset($this->animals[$index])) {
            $old_animal = $this->animals[$index];
            $this->animals[$index] = $data;
            echo "Hewan di index " . ($index + 1) . " telah diperbarui dari '$old_animal' menjadi: '$data'<br>";
        } else {
            echo "Index " . ($index + 1) . " tidak ditemukan.<br>";
        }
    }

    # method destroy - menghapus hewan
    # parameter: index
    public function destroy($index) {
        if (isset($this->animals[$index])) {
            $removed = $this->animals[$index];
            array_splice($this->animals, $index, 1);
            echo "Hewan '$removed' telah dihapus dari daftar.<br>";
        } else {
            echo "Index " . ($index + 1) . " tidak ditemukan.<br>";
        }
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['Kucing', 'Anjing', 'Kelinci']);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('Burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";
