$(document).ready(function () {
  // Call the selesai function to start checking for new messages periodically
  selesai();
});

function selesai() {
  // Use setInterval instead of setTimeout for periodic execution
  setInterval(function () {
    jumlah(); // Update the notification count
    pesan(); // Fetch and display new messages
    jumlah2(); // Update the notification count
    messeage(); // Fetch and display new messages
    jumlah3(); // Update the notification count
    izin(); // Fetch and display new messages
  }, 200); // Interval in milliseconds (e.g., 2000 ms = 2 seconds)
}

function jumlah() {
  // Fetch the notification count from data.php
  $.getJSON("data.php", function (datas) {
    $("#notif").html(datas.jumlah);
  });
}

function pesan() {
  $.getJSON("data_pesan.php", function (data) {
    $("#pesan").empty();
    var no = 1;
    $.each(data.result, function () {
      $("#pesan").append(`<a id="pesan" class="dropdown-item" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                </svg>&nbsp;${this["nama"]}, Tujuan : ${this["tujuan"]}, Status : (${this["clear_data"]})</a>`);
    });
  });
}

function jumlah2() {
  // Fetch the notification count from data.php
  $.getJSON("data_klinik.php", function (datas) {
    $("#kliniknot").html(datas.jumlah2);
  });
}

function messeage() {
  $.getJSON("data_pesan_klinik.php", function (data) {
    $("#messeage").empty();
    $.each(data.result, function () {
      $("#messeage").append(`<a class="dropdown-item" href="data-klinik.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                  </svg>&nbsp;${this["nama_karyawan"]}, <br>Keluhan: ${this["keluhan"]}</a>`);
    });

    $("#kliniknot").text(data.total); // Update the notification badge count
  });
}

// Call the messeage() function initially to display the count
messeage();

function jumlah3() {
  // Fetch the notification count from data.php
  $.getJSON("data_izin.php", function (datas) {
    $("#izinnotif").html(datas.jumlah3);
  });
}

function izin() {
  $.getJSON("data_pesan_izin.php", function (data) {
    $("#izin").empty();
    $.each(data.result, function () {
      $("#izin").append(`<a class="dropdown-item" href="data-izin-kendaraan.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                  </svg>&nbsp;${this["nama"]}, <br>Tujuan: ${this["tujuan"]}</a>`);
    });

    $("#izinnotif").text(data.total); // Update the notification badge count
  });
}

izin();
