document.addEventListener("DOMContentLoaded", function() {
  var backgrounds = [];
  var imagesFolder = 'images/';

  // Mengisi array backgrounds dengan daftar gambar dari folder
  for (var i = 1; i <= 10; i++) {
    backgrounds.push(imagesFolder + 'bg' + i + '.jpg');
  }

  var currentBackgroundIndex = Math.floor(Math.random() * backgrounds.length);

  // Fungsi untuk mengubah latar belakang secara periodik
  function changeBackground() {
    currentBackgroundIndex = (currentBackgroundIndex + 1) % backgrounds.length;
    document.body.style.backgroundImage = 'url(' + backgrounds[currentBackgroundIndex] + ')';
  }

  // Set latar belakang awal dan atur interval pergantian latar belakang
  document.body.style.backgroundImage = 'url(' + backgrounds[currentBackgroundIndex] + ')';
  setInterval(changeBackground, 3500);

  var buttons = document.querySelectorAll('.toggle-button, .fullscreen-button, .logout-button');
  var timeoutId;

  // Fungsi untuk menampilkan tombol-tombol dan mengatur timeout untuk menyembunyikannya
  function showButtons() {
    buttons.forEach(function(button) {
      button.classList.remove('hidden');
    });

    // Reset timeout untuk menyembunyikan tombol-tombol lagi setelah 2 detik
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
      buttons.forEach(function(button) {
        button.classList.add('hidden');
      });
    }, 2000);
  }

  // Event listener untuk menampilkan tombol-tombol saat mouse bergerak, keyboard ditekan, atau mouse diklik
  document.addEventListener('mousemove', showButtons);
  document.addEventListener('keydown', showButtons);
  document.addEventListener('click', showButtons);
  // Event listener untuk perangkat seluler
document.addEventListener('touchstart', showButtons);
document.addEventListener('touchmove', showButtons);
document.addEventListener('touchend', showButtons);
});

// Fungsi untuk toggle mode fullscreen
function toggleFullscreen() {
  if (!document.fullscreenElement) {
    document.documentElement.requestFullscreen();
    document.querySelector('.fullscreen-button').textContent = 'Exit Fullscreen';
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    }
    document.querySelector('.fullscreen-button').textContent = 'Full screen';
  }
}

// Fungsi untuk toggle tampilan card
function toggleCard() {
  var card = document.querySelector('.card') || document.querySelector('#card');
  var toggleButton = document.querySelector('.toggle-button');

  if (card) {
    card.classList.toggle('hidden');
  }

  if (toggleButton) {
    if (card.classList.contains('hidden')) {
      toggleButton.textContent = 'Show';
    } else {
      toggleButton.textContent = 'Hide';
    }
  }
}

// Ambil elemen div dengan id "clock"
var clock = document.getElementById('clock');

// Buat fungsi untuk mengupdate waktu setiap detik
function updateTime() {
    // Buat objek Date untuk mendapatkan waktu saat ini
    var now = new Date();

    // Ambil informasi waktu
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var day = now.getDate();
    var dayOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'][now.getDay()];
    var monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var month = monthNames[now.getMonth()];
    var year = now.getFullYear();

    // Format waktu jika angka kurang dari 10, tambahkan "0" di depannya
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    day = day < 10 ? '0' + day : day;

    // Tampilkan waktu dalam format yang diinginkan
    var timeString = hours + ':' + minutes + ':' + seconds + '    ' + dayOfWeek + ', ' + day + ' ' + month + ' ' + year;

    // Masukkan waktu ke dalam elemen div dengan id "clock"
    clock.textContent = timeString;
}

// Panggil fungsi updateTime setiap detik
setInterval(updateTime, 1000);
