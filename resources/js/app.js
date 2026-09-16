import 'bootstrap';
import QRCode from 'qrcode';

const qrisCanvas = document.querySelector('[data-qris-payload]');

if (qrisCanvas) {
	QRCode.toCanvas(qrisCanvas, qrisCanvas.dataset.qrisPayload, {
		width: 220,
		margin: 2,
		errorCorrectionLevel: 'M',
	});
}
