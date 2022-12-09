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

$(".hitungTotal").on('input', function () {
    var hargaSewa = document.getElementById('hargaSewa').innerHTML;
    hargaSewa = parseFloat(hargaSewa);
    console.info("harga sewa" + hargaSewa)

    // var qty = document.getElementById('qty').value;
    // qty = parseFloat(qty);

    let date1 = document.getElementById('berangkat').value;
    let date2 = document.getElementById('kembali').value;

    // document.getElementById('hasilgak').value = price * qty;
    // let hasil = price * qty;



    var dob1 = new Date(date1);
    var dob2 = new Date(date2);
    console.log("date1" + date1)
    console.log("date2 " + date2)
    let hasildate = dob2.getTime() - dob1.getTime();
    let lamaSewa = hasildate / (1000 * 3600 * 24)
    lamaSewa = parseFloat(lamaSewa);
    console.info("hasil " + lamaSewa)

    let totalSewa = hargaSewa * lamaSewa;
    let dp = 25 / 100 * totalSewa;
    let sisa = totalSewa - dp;

    // console.log("hasil " + hasil)
    document.getElementById('lamaSewa').innerHTML = lamaSewa + " Hari";
    document.getElementById('totalHarga').innerHTML = "Rp" + rupiah(totalSewa);
    document.getElementById('dp').innerHTML = "Rp" + rupiah(dp);
    document.getElementById('sisa').innerHTML = "Rp" + rupiah(sisa);
});