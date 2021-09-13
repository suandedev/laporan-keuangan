package com.made_suande_1811010036.android.model;

import com.google.gson.annotations.SerializedName;

public class PostProduk {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    String mProduk;
    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getmProduk() {
        return mProduk;
    }

    public void setmProduk(String mProduk) {
        this.mProduk = mProduk;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
