<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends My_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = [
      'navbar' => 'dashboard',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates/footer');
  }

  public function mahasiswa()
  {
    $data = [
      'judul' => 'Data Mahasiswa',
      'navbar' => 'mahasiswa',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/mahasiswa', $data);
    $this->load->view('templates/footer');
  }

  public function dosen()
  {
    $data = [
      'judul' => 'Data Dosen',
      'navbar' => 'dosen',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/dosen', $data);
    $this->load->view('templates/footer');
  }

  public function kelas()
  {
    $data = [
      'judul' => 'Data Kelas',
      'navbar' => 'kelas',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/kelas', $data);
    $this->load->view('templates/footer');
  }
  
  public function matkul()
  {
    $data = [
      'judul' => 'Data Mata Kuliah',
      'navbar' => 'matkul',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/matkul', $data);
    $this->load->view('templates/footer');
  }

  public function matkulampuh()
  {
    $data = [
      'judul' => 'Data Mata Kuliah Ampuh',
      'navbar' => 'matkulampuh',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/matkulampuh', $data);
    $this->load->view('templates/footer');
  }

  public function soal()
  {
    $data = [
      'judul' => 'Data Soal',
      'navbar' => 'soal',
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/soal', $data);
    $this->load->view('templates/footer');
  }

  public function acaksoal()
  {
    $data = [
      'judul' => 'Data Acak Soal',
      'navbar' => 'acaksoal',
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('admin/acaksoal', $data);
    $this->load->view('templates/footer');
  }

  public function LCM()
  {
    $n = 20; #jumlah looping
    $a = 11; #konstanta harus lebih besar dari m
    $m = 25; #harus bilangan prima
    $c = 3; #konstanta harus angka ganjil
    $Xn0 = mt_rand(5,$m); #angka ganjil cukup besar
    $Xn = [];

    for ($i=1; $i<=$n; $i++) {
      if($i == 1){
        $Xn[$i] = ($a * $Xn0 + $c) % $m;
      }else if($i>1 && $i<<10){
        $Xn[$i] = ($a * $Xn[$i-1] + $c) % $m;
      }else{
        echo "Algoritma LCM Telah Selesai";
        break;
      }
      if($Xn[$i] == 0) $Xn[$i] = 1;

      echo $Xn[$i]." - ";
    }
  }
}
