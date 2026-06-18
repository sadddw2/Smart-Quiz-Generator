from flask import Flask, request, jsonify
from pypdf import PdfReader
import re
import random

app = Flask(__name__)

def baca_pdf(file):
    reader = PdfReader(file)
    text = ""

    for page in reader.pages:
        text += page.extract_text() or ""

    return text


def ringkas_teks(kalimat, max_kata=14):
    kata = kalimat.split()
    return " ".join(kata[:max_kata]) + ("..." if len(kata) > max_kata else "")


def ambil_kata_kunci(kalimat):
    stopwords = {
        "yang", "dan", "di", "ke", "dari", "untuk", "dengan", "pada",
        "adalah", "dalam", "sebagai", "atau", "ini", "itu", "karena",
        "oleh", "akan", "dapat", "lebih", "juga", "secara", "suatu",
        "merupakan", "yaitu", "tersebut", "sehingga"
    }

    kata = re.findall(r'\b[A-Za-zÀ-ÿ]{5,}\b', kalimat)
    kandidat = [k for k in kata if k.lower() not in stopwords]

    if kandidat:
        return random.choice(kandidat)

    return "materi"


def buat_jawaban_salah():
    pilihan = [
        "tidak memiliki hubungan dengan pembahasan materi.",
        "hanya digunakan sebagai tampilan tambahan tanpa fungsi utama.",
        "berfungsi untuk menghapus seluruh data secara otomatis.",
        "tidak diperlukan dalam proses pembelajaran.",
        "hanya digunakan untuk mengganti isi materi secara acak.",
        "tidak berpengaruh terhadap proses evaluasi.",
        "digunakan untuk memperlambat proses pengelolaan data.",
        "hanya berfungsi sebagai penyimpanan sementara tanpa tujuan jelas."
    ]

    return random.sample(pilihan, 3)


def buat_soal(text, jumlah=10):
    kalimat_list = re.split(r'(?<=[.!?])\s+', text)
    kalimat_list = [k.strip() for k in kalimat_list if len(k.split()) >= 12]

    hasil = []
    pertanyaan_sudah = set()

    for i, kalimat in enumerate(kalimat_list):
        if len(hasil) >= jumlah:
            break

        kata = kalimat.split()
        titik_potong = len(kata) // 2

        awal_kalimat = " ".join(kata[:titik_potong])
        lanjutan_benar = " ".join(kata[titik_potong:])

        pertanyaan = f'{awal_kalimat} ?'

        if pertanyaan in pertanyaan_sudah:
            continue

        pertanyaan_sudah.add(pertanyaan)

        sumber_salah = [k for idx, k in enumerate(kalimat_list) if idx != i and len(k.split()) >= 12]

        if len(sumber_salah) < 3:
            continue

        pilihan_salah = []

        for kalimat_salah in random.sample(sumber_salah, 3):
            kata_salah = kalimat_salah.split()
            potong_salah = len(kata_salah) // 2
            lanjutan_salah = " ".join(kata_salah[potong_salah:])
            pilihan_salah.append(lanjutan_salah)

        opsi = pilihan_salah + [lanjutan_benar]
        random.shuffle(opsi)

        jawaban_benar = ["A", "B", "C", "D"][opsi.index(lanjutan_benar)]

        hasil.append({
            "pertanyaan": pertanyaan,
            "pilihan_a": opsi[0],
            "pilihan_b": opsi[1],
            "pilihan_c": opsi[2],
            "pilihan_d": opsi[3],
            "jawaban_benar": jawaban_benar,
            "kesulitan": random.choice(["mudah", "sedang", "sulit"])
        })

    return hasil

@app.route('/generate', methods=['POST'])
def generate():
    if 'pdf' not in request.files:
        return jsonify({"error": "File PDF tidak ditemukan"}), 400

    file = request.files['pdf']
    jumlah = int(request.form.get('jumlah_soal', 10))

    text = baca_pdf(file)

    if not text.strip():
        return jsonify({"error": "PDF kosong atau tidak bisa dibaca"}), 400

    soal = buat_soal(text, jumlah)

    return jsonify(soal)


if __name__ == '__main__':
    app.run(debug=True, port=5000)