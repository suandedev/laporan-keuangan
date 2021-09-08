package com.made_suande_1811010036.android;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;

import android.os.Bundle;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.made_suande_1811010036.android.fragment.HomeFragment;
import com.made_suande_1811010036.android.fragment.ProdukFragment;
import com.made_suande_1811010036.android.fragment.TransaksiFragment;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        loadFragment(new HomeFragment());
        BottomNavigationView bottomNavigationView = findViewById(R.id.bottomMenu);
        bottomNavigationView.setOnNavigationItemSelectedListener(item -> {
            Fragment fragment = null;
            switch (item.getItemId()){
                case R.id.home_menu:
                    fragment = new HomeFragment();
                    break;
                case R.id.produk_menu:
                    fragment = new ProdukFragment();
                    break;
                case  R.id.transaksi_menu:
                    fragment = new TransaksiFragment();
                    break;
            }
            return loadFragment(fragment);

        });
    }

    private boolean loadFragment(Fragment fragment)
    {
        if (fragment != null) {
            getSupportFragmentManager().beginTransaction()
                    .replace(R.id.fl_container, fragment)
                    .commit();
            return  true;
        }
        return false;
    }
}
