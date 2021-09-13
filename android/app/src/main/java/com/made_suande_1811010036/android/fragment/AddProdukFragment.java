package com.made_suande_1811010036.android.fragment;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.made_suande_1811010036.android.R;
import com.made_suande_1811010036.android.model.PostProduk;
import com.made_suande_1811010036.android.rest.ApiClient;
import com.made_suande_1811010036.android.rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class AddProdukFragment extends Fragment {

    Button btn_add_produk;
    EditText nama, harga_jual, harga_modal, deskripsi;
    ApiInterface mApiInterface;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_add_produk, container, false);

        dataIint(view);
        return  view;
    }

    private void dataIint(View view) {

        nama = view.findViewById(R.id.ed_produk);
        harga_jual = view.findViewById(R.id.ed_harga_jual);
        harga_modal = view.findViewById(R.id.ed_harga_modal);
        deskripsi = view.findViewById(R.id.ed_deskripsi);
        String gambar = "aa";

        btn_add_produk = view.findViewById(R.id.btn_simpan_produk);

        mApiInterface = ApiClient.getClient().create(ApiInterface.class);

        btn_add_produk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Call<PostProduk> postProdukCall = mApiInterface.postProduk(
                        nama.getText().toString(),
                        harga_jual.getText().toString(),
                        harga_modal.getText().toString(),
                        deskripsi.getText().toString(),
                        gambar.toString()
                        );
                postProdukCall.enqueue(new Callback<PostProduk>() {
                    @Override
                    public void onResponse(Call<PostProduk> call, Response<PostProduk> response) {
                        ProdukFragment.pf.refresh();
                    }

                    @Override
                    public void onFailure(Call<PostProduk> call, Throwable t) {
                        Toast.makeText(getContext(), t.getMessage().toString(), Toast.LENGTH_LONG).show();
                    }
                });
            }
        });
    }
}