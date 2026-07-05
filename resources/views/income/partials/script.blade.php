<script>
    const nominal = document.getElementById('nominal');
    const diskon = document.getElementById('diskon');
    const ongkir = document.getElementById('ongkir');
    const total = document.getElementById('total_bersih');

    function hitungTotal() {

        const n = parseFloat(nominal.value) || 0;
        const d = parseFloat(diskon.value) || 0;
        const o = parseFloat(ongkir.value) || 0;

        const hasil = n - (n * d / 100) + o;

        total.value = hasil.toLocaleString('id-ID');
    }

    nominal.addEventListener('input', hitungTotal);
    diskon.addEventListener('input', hitungTotal);
    ongkir.addEventListener('input', hitungTotal);

    hitungTotal();
</script>