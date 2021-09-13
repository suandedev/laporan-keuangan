package com.made_suande_1811010036.android.rest;

import com.made_suande_1811010036.android.model.GetProduk;
import com.made_suande_1811010036.android.model.PostProduk;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {

    @GET("produk")
    Call<GetProduk> getProduk();

    @FormUrlEncoded
    @POST("produk")
    Call<PostProduk> postProduk (@Field("nama") String nama,
                                 @Field("harga_jual") String  harga_jual,
                                 @Field("harga_modal") String harga_modal,
                                 @Field("deskripsi") String deskripsi,
                                 @Field("gambar") String gambar);
}
