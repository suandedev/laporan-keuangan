package com.made_suande_1811010036.android.model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GetProduk {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Produk> listProduk;
    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public List<Produk> getListProduk() {
        return listProduk;
    }

    public void setListProduk(List<Produk> listProduk) {
        this.listProduk = listProduk;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
