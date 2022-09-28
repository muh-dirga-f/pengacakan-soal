const app = new Framework7({
    // App root element
    el: '#app',
    theme: 'ios',
    // App Name
    name: 'Lelang',
    // App id
    id: 'com.myapp.lelang',
    // Enable swipe panel
    panel: {
        swipe: true,
    },
    // Add default routes
    routes: [
        //admin-link
        {
            path: '/login-admin/',
            componentUrl: 'pages/login-admin.html',
        },
        {
            path: '/home-admin/',
            componentUrl: 'pages/admin/home.html',
        },
        {
            path: '/list-data/',
            componentUrl: 'pages/admin/list-data.html',
        },
        {
            path: '/data-user/',
            componentUrl: 'pages/admin/data-user.html',
        },
        {
            path: '/data-barang/',
            componentUrl: 'pages/admin/data-barang.html',
        },
        {
            path: '/data-penawaran/',
            componentUrl: 'pages/admin/data-penawaran.html',
        },
        {
            path: '/data-pembayaran/',
            componentUrl: 'pages/admin/data-pembayaran.html',
        },
        //user-link
        {
            path: '/registrasi/',
            componentUrl: 'pages/registrasi.html',
        },
        {
            path: '/home-user/',
            componentUrl: 'pages/user/home.html',
        },
        {
            path: '/lelang-user/',
            componentUrl: 'pages/user/lelang.html',
        },
        {
            path: '/lelang-terkini/',
            componentUrl: 'pages/user/lelang-terkini.html',
        },
        {
            path: '/histori-penawaran/',
            componentUrl: 'pages/user/histori-penawaran.html',
        },
        {
            path: '/lihat-lelang/',
            componentUrl: 'pages/user/lihat-lelang.html',
        },
        {
            path: '/daftar-barang/',
            componentUrl: 'pages/user/daftar-barang.html',
        },
        {
            path: '/profil-user/',
            componentUrl: 'pages/user/profil.html',
        },
        {
            path: '/checkout/',
            componentUrl: 'pages/user/checkout.html',
        },
        {
            path: '/login-user/',
            componentUrl: 'pages/login-user.html',
        },
    ],
});

let store = app.createStore({
    state: {
        users: [],
    },
});

let $ = Dom7;
let mainView = app.views.create('.view-main');
// app.views.main.router.navigate('/home-user/');

$('.login-user').on('click', function () {
    var formData = app.form.convertToData('#login-user');
    if (formData.email != "" || formData.password != "") {
        loginUser(formData).then(res => {
            if (res.status) {
                app.views.main.router.navigate('/home-user/');
                store.state.users = [];
                store.state.users.push(res.dataid, res.data);
            } else {
                app.dialog.alert(res.pesan);
            }
        });
        // alert(JSON.stringify(formData));
    } else {
        app.dialog.alert("E-mail atau Password tidak boleh kosong");
    }
});