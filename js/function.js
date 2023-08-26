/**
 * fungsi untuk membuat default value ipk ketika body onload
 */
function isiIPKOtomatis() {
   let ipkField = document.getElementById("ipkSelect");
   let randomIPK = Math.random() * (4 - 2) + 2; // Nilai acak antara 2.0 dan 3.9
   ipkField.value = randomIPK.toFixed(2); // Membulatkan nilai ke 2 angka di belakang koma
}

function cekIPK() {
   let ipkField = document.getElementById("ipkSelect");
   let ipkValue = parseFloat(ipkField.value);
   let beasiswaButton = document.getElementById("selectBeasiswa");
   let uploadButton = document.getElementById("uploadBerkas");
   let simpanButton = document.getElementById("simpanButton");

   if (ipkValue < 3) {
      beasiswaButton.disabled = true;
      uploadButton.disabled = true;
      simpanButton.disabled = true;
   } else {
      beasiswaButton.disabled = false;
      uploadButton.disabled = false;
      simpanButton.disabled = false;
   }
}


// get id semesterSelect
const semesterSelect = document.getElementById("semesterSelect");

// Jumlah semester yang ingin ditampilkan
const jumlahSemester = 8;

// looping value and option
for (let i = 1; i <= jumlahSemester; i++) {
   const option = document.createElement("option");
   option.value = i;
   option.text = `Semester ${i}`;
   semesterSelect.appendChild(option);
}