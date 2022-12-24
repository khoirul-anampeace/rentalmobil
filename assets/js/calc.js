function rupiah(bilangan) {
    let number_string = bilangan.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    return rupiah;
}

function getDateNow(date = new Date()) {
    // Create a date object from a date string
    var date = new Date(date);

    // Get year, month, and day part from the date
    var year = date.toLocaleString("default", {
        year: "numeric"
    });
    var month = date.toLocaleString("default", {
        month: "2-digit"
    });
    var day = date.toLocaleString("default", {
        day: "2-digit"
    });

    // Generate yyyy-mm-dd date string
    var formattedDate = year + "-" + month + "-" + day;

    return formattedDate;
}

$(".hitungTotal").on('input', function () {
    var hargaSewa = document.getElementById('hargaSewa').innerHTML;
    var tarifDriver = document.getElementById('tarifDriver').innerHTML;
    var jenisTransaksi = document.getElementById('jenisTransaksi').innerHTML;
    hargaSewa = parseFloat(hargaSewa);
    console.info("harga sewa" + hargaSewa)
    console.info("tarif sewa" + tarifDriver)
    console.info("jenis sewa" + jenisTransaksi)

    // var qty = document.getElementById('qty').value;
    // qty = parseFloat(qty);

    let date1 = document.getElementById('berangkat').value;
    let date2 = document.getElementById('kembali').value;
    let dateNow = getDateNow();

    // document.getElementById('hasilgak').value = price * qty;
    // let hasil = price * qty;



    let dob1 = new Date(date1);
    let dob2 = new Date(date2);
    let datesekarang = new Date();

    console.log("date1" + dob1)
    console.log("date2 " + dob1)
    console.log("date Now" + datesekarang)
    let hasildate = dob2.getTime() - dob1.getTime();
    let lamaSewa = hasildate / (1000 * 3600 * 24)
    lamaSewa = parseFloat(lamaSewa);
    console.info("hasil " + lamaSewa)
    let totalSewa;
    let dp;
    let sisa;
    let hitungsekarang;
    let hitunglamasekarang;
    if (jenisTransaksi == "Lepas") {
        totalSewa = hargaSewa * lamaSewa;
        dp = 25 / 100 * totalSewa;
        sisa = totalSewa - dp;
        hitungsekarang = dob1.getTime() - datesekarang.getTime();
        hitunglamasekarang = hitungsekarang / (1000 * 3600 * 24);
    } else if (jenisTransaksi == "Driver") {
        totalTarifDriver = tarifDriver * lamaSewa;
        totalHargaSewa = hargaSewa * lamaSewa;
        totalSewa = totalTarifDriver + totalHargaSewa;
        dp = 25 / 100 * totalSewa;
        sisa = totalSewa - dp;
        hitungsekarang = dob1.getTime() - datesekarang.getTime();
        hitunglamasekarang = hitungsekarang / (1000 * 3600 * 24);
    } else {
        alert('Transaksi tidak diketahui')
    }
    // console.info("hitung validasi" + hitungvalidasitanggal)
    if (lamaSewa <= 0) {
        alert("tanggal kembali tidak valid");
        document.getElementById('lamaSewa').innerHTML = "Tanggal tidak valid";
        document.getElementById('totalHarga').innerHTML = "Tanggal tidak valid";
        document.getElementById('dp').innerHTML = "Tanggal tidak valid";
        document.getElementById('sisa').innerHTML = "Tanggal tidak valid";
        document.getElementById('kembali').value = 0;

        document.getElementById('InLama').value = 0;
        document.getElementById('InTotal').value = 0;
        document.getElementById('InDp').value = 0;
        document.getElementById('InSisa').value = 0;
    } else {
        console.info("tanggal valid")
        document.getElementById('lamaSewa').innerHTML = lamaSewa + " Hari";
        document.getElementById('totalHarga').innerHTML = "Rp " + rupiah(totalSewa);
        document.getElementById('dp').innerHTML = "Rp " + rupiah(dp);
        document.getElementById('sisa').innerHTML = "Rp " + rupiah(sisa);

        document.getElementById('InLama').value = lamaSewa;
        document.getElementById('InTotal').value = totalSewa;
        document.getElementById('InDp').value = dp;
        document.getElementById('InSisa').value = sisa;
    }

    console.info("____")
    console.info("hitungsekarang " + hitungsekarang)
    console.info("hitungvalid " + hitunglamasekarang)

    if (hitunglamasekarang <= 0.0) {
        alert("Silahkan lakukan pemesanan sehari sebelum keberangkatan")
        location.reload()
    } else {

        console.info("tanggal valid bos")
    }
});