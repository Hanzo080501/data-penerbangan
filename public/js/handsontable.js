document.addEventListener('DOMContentLoaded', function () {
  const container = document.getElementById('hot');
  let hot;
  const hyperformulaInstance = HyperFormula.buildEmpty();
  // Meng-handle upload file Excel
  document.getElementById('excelFile').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const data = new Uint8Array(e.target.result);
      const workbook = XLSX.read(data, { type: 'array' });
      const sheet = workbook.Sheets[workbook.SheetNames[0]];
      const jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });

      // Menampilkan data di Handsontable
      hot = new Handsontable(container, {
        data: jsonData,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        formulas: {
          engine: hyperformulaInstance,
        },
        height: 500,
        width: '100%',
        licenseKey: 'non-commercial-and-evaluation',
      });
    };

    reader.readAsArrayBuffer(file);
  });

  // Menangani form submit dan mengirim data Handsontable
  document.getElementById('uploadForm').addEventListener('submit', function (event) {
    const data = hot.getData(); // Ambil data dari Handsontable
    document.getElementById('tableData').value = JSON.stringify(data); // Simpan data ke input tersembunyi
  });
});
