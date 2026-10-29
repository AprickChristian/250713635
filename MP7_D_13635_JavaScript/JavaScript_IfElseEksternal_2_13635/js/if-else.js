var iJam;
var sJenis;
alert("");
iJam = prompt("Masukkan lama parkir (jam)", 1);
sJenis = prompt("Jenis Kendaraan: (M)otor atau Mo(B)il?", "M");

if (iJam > 3) {
    if (sJenis == "M") {
        alert("Tarif Parkir motor Rp 6.000");
    } else {
        alert("Tarif Parkir mobil Rp 12.000");
    }
} else {
    if (sJenis == "M") {
        alert("Tarif Parkir motor Rp 3.000");
    } else {
        alert("Tarif Parkir mobil Rp 6.000");
    }
}