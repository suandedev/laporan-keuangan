package com.made_suande_1811010036.android.rest;

import com.made_suande_1811010036.android.model.GetProduk;

import retrofit2.Call;
import retrofit2.http.GET;

public interface ApiInterface {

    @GET("produk")
    Call<GetProduk> getProduk();
}
