<?php
use App\Siswa;
use App\Dosen;

function totalSiswa(){
    return Siswa::count(); 
} 

function totalDosen(){
    return Dosen::count(); 
} 