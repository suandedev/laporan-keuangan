package com.made_suande_1811010036.android.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.made_suande_1811010036.android.R;
import com.made_suande_1811010036.android.model.Produk;

import java.util.List;

public class ProdukAdapter extends RecyclerView.Adapter<ProdukAdapter.MyViewHolder> {

    List<Produk> mProdukList;

    public ProdukAdapter(List<Produk> mProdukList) {
        this.mProdukList = mProdukList;
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View mview = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_produk, parent, false);
        MyViewHolder myViewHolder = new MyViewHolder(mview);
        return  myViewHolder;
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder holder, int position) {
        holder.mTextViewNama.setText("nama produk : " + mProdukList.get(position).getNama());
        holder.mTextViewHarga_jual.setText("harga produk : " + mProdukList.get(position).getHarga_jual());
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(v.getContext(), "ok", Toast.LENGTH_LONG).show();
            }
        });
    }

    @Override
    public int getItemCount() {
        return mProdukList.size();
    }

    public  class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewNama, mTextViewHarga_jual;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);
            mTextViewNama = itemView.findViewById(R.id.txt_nama);
            mTextViewHarga_jual = itemView.findViewById(R.id.txt_harga_jual);
        }
    }
}
