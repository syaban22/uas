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

if (flashdata == 'oops') {
	Swal.fire({
		position: 'center',
		icon: 'warning',
		title: 'Oops...',
		text: 'Lengkapi validasi dan upload kembali file Anda',
		showConfirmButton: true,
	})
}
