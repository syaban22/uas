const flashdata = $('.flash-data').data('flashdata');
if (flashdata == 'Akses telah diganti') {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Level akses berhasil diganti',
		showConfirmButton: false,
		timer: 1500
	})
}

if (flashdata == 'berhasil dikirim') {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Lamaran pekerjaan telah terkirim',
		showConfirmButton: true,
	})
}

if (flashdata == 'Format KTP Salah') {
	Swal.fire({
		position: 'center',
		icon: 'error',
		title: 'Format KTP Salah',
		showConfirmButton: true,
	})
}

if (flashdata == 'Format Foto Salah') {
	Swal.fire({
		position: 'center',
		icon: 'error',
		title: 'Upload Foto Gagal',
		text: 'Harap sesuaikan dengan format yang telah ditentukan',
		showConfirmButton: true,
	})
}

// sweet alert untuk logout
$('.out').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Keluar ?',
		text: "Pilih 'Keluar' untuk melanjutkan",
		icon: 'question',
		showCancelButton: true,
		focusConfirm: false,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Keluar',
		cancelmButtonText: 'Cancel'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

if (flashdata == 'Logout berhasil') {
	Swal.fire({
		title: '<strong>Anda telah logout</strong>',
		imageUrl: './asset/img/gambar/th.png',
		imageWidth: 300,
		imageHeight: 180,
		imageAlt: 'Custom image',
		showCloseButton: true,
		showCancelButton: false,
		focusConfirm: false,
		showConfirmButton: false,
		timer: 4000
	})
}
