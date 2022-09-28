// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyBZkCenHymIzR9q-wKTCMppihsyh2f5Vvg",
  authDomain: "pengacakan-soal.firebaseapp.com",
  projectId: "pengacakan-soal",
  storageBucket: "pengacakan-soal.appspot.com",
  messagingSenderId: "467418203955",
  appId: "1:467418203955:web:700175ac1a79bfaee7a046",
  databaseURL: "https://pengacakan-soal-default-rtdb.asia-southeast1.firebasedatabase.app",
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// CRUD
async function tambahData(table, data) {
  let pesan = "";
  let status = false;
  await firebase.database().ref(table).push().set(data, function (error) {
    if (error) {
      pesan = "Data tidak dapat di tambah." + error;
    } else {
      pesan = "Data berhasil di tambah.";
      status = true;
    }
  });
  return {
    "status": status,
    "pesan": pesan,
  };
}
//hapus data
async function hapusData(id) {
  let pesan = "";
  let status = false;
  await firebase.database().ref(id).remove()
    .then(function () {
      pesan = "Data berhasil di hapus.";
      status = true;
    })
    .catch(function (error) {
      pesan = "Data gagal di hapus." + error;
    });
  return {
    "status": status,
    "pesan": pesan,
  };
}
//select data
async function getData(table) {
  let data = "";
  await firebase.database().ref(table).once('value').then((snapshot) => {
    data = snapshot.val();
  });
  return {
    "data": data
  };
}
//update data
async function updateData(table, data) {
  let pesan = "";
  let status = false;
  await firebase.database().ref(table).update(data, function (error) {
    if (error) {
      pesan = "Data tidak dapat di update." + error;
    } else {
      pesan = "Data berhasil di update.";
      status = true;
    }
  });
  return {
    "status": status,
    "pesan": pesan
  };
}
