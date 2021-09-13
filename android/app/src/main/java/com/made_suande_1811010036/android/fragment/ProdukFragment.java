package com.made_suande_1811010036.android.fragment;

import android.content.Intent;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.made_suande_1811010036.android.R;
import com.made_suande_1811010036.android.adapter.ProdukAdapter;
import com.made_suande_1811010036.android.model.GetProduk;
import com.made_suande_1811010036.android.model.Produk;
import com.made_suande_1811010036.android.rest.ApiClient;
import com.made_suande_1811010036.android.rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ProdukFragment extends Fragment {

    Button btn_insert;

    ApiInterface mApiInterface;
    private RecyclerView mReciclerView;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mLayoutManager;
    public static ProdukFragment pf;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_produk, container, false);
        dataInit(view);
    return view;
    }

    private void dataInit(View view) {

        btn_insert = view.findViewById(R.id.btIns);

        mReciclerView = view.findViewById(R.id.recyclerView_produk);
        mLayoutManager = new LinearLayoutManager(getContext());
        mReciclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        pf = this;
        refresh();

        btn_insert.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getFragmentManager().beginTransaction()
                        .replace(R.id.fragment_produk, new AddProdukFragment())
                        .commit();
            }
        });
    }

    public void refresh() {
        Call<GetProduk> produkCall = mApiInterface.getProduk();
        produkCall.enqueue(new Callback<GetProduk>() {
            @Override
            public void onResponse(Call<GetProduk> call, Response<GetProduk> response) {
                List<Produk> produkList = response.body().getListProduk();
                Log.d("retrofit get", "jumlah data kontak" +
                        String.valueOf(produkList.size()));
                mAdapter = new ProdukAdapter(produkList);
                mReciclerView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<GetProduk> call, Throwable t) {
                Log.d("retrofit get", t.toString());
            }
        });
    }

}