package com.made_suande_1811010036.android.model;

import com.google.gson.annotations.SerializedName;

public class Produk {

    @SerializedName("id")
    private String id;
    @SerializedName("nama")
    private String nama;
    @SerializedName("harga_jual")
    private String harga_jual;
    @SerializedName("harga_modal")
    private String harga_modal;
    @SerializedName("deskripsi")
    private String deskripsi;
    @SerializedName("gambar")
    private String gambar;

    public Produk() {

    }

    public Produk(String id, String nama, String harga_jual, String harga_modal, String deskripsi, String gambar) {
        this.id = id;
        this.nama = nama;
        this.harga_jual = harga_jual;
        this.harga_modal = harga_modal;
        this.deskripsi = deskripsi;
        this.gambar = gambar;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getHarga_jual() {
        return harga_jual;
    }

    public void setHarga_jual(String harga_jual) {
        this.harga_jual = harga_jual;
    }

    public String getHarga_modal() {
        return harga_modal;
    }

    public void setHarga_modal(String harga_modal) {
        this.harga_modal = harga_modal;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }
}
