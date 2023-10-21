<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ten_xe');
            $table->string('hang_xe');
            $table->integer('nam_san_xuat');
            $table->string('gia_ban');
            $table->string('noi_ban');
            $table->string('so_km');
            $table->date('ngay_ban');
            $table->text('mo_ta');
            $table->string('dong_xe');
            $table->string('nhien_lieu');
            $table->string('xuat_xu');
            $table->string('kieu_dang');
            $table->integer('so_cho');
            $table->string('anh'); 
            $table->string('chi_tiet_anh'); 
            $table->timestamps();
        });
    }
    
    

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
