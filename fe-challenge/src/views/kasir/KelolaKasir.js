import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {
  CCard,
  CCardBody,
  CCardHeader,
  CCol,
  CRow,
  CTable,
  CTableBody,
  CTableDataCell,
  CTableHead,
  CTableHeaderCell,
  CTableRow,
} from '@coreui/react';

const KelolaKasir = () => {
  const [dataKasir, setDataKasir] = useState([]);

  useEffect(() => {
    axios
      .get('http://localhost:8000/api/kasirs')
      .then((response) => {
        console.log(response.data);
        setDataKasir(response.data.kasirs); // Access the "kasirs" array directly
      })
      .catch((error) => {
        console.error('Error fetching data:', error);
      });
  }, []);

  return (
    <div>
      <CRow>
        <CCol>
          <CCard>
            <CCardHeader>Data Kasir</CCardHeader>
            <CCardBody>
              <CTable striped bordered responsive>
                <CTableHead>
                  <CTableRow>
                    <CTableHeaderCell>Kode Kasir</CTableHeaderCell>
                    <CTableHeaderCell>Nama</CTableHeaderCell>
                    <CTableHeaderCell>HP</CTableHeaderCell>
                  </CTableRow>
                </CTableHead>
                <CTableBody>
                  {dataKasir.map((kasir, index) => (
                    <CTableRow key={index}>
                      <CTableDataCell>{kasir.KodeKasir}</CTableDataCell>
                      <CTableDataCell>{kasir.Nama}</CTableDataCell>
                      <CTableDataCell>{kasir.HP}</CTableDataCell>
                    </CTableRow>
                  ))}
                </CTableBody>
              </CTable>
            </CCardBody>
          </CCard>
        </CCol>
      </CRow>
    </div>
  );
};

export default KelolaKasir;
