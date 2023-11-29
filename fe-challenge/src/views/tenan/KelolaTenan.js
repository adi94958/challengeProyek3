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

const KelolaTenan = () => {
    const [dataTenan, setDataTenan] = useState([]);

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/tenans')
            .then((response) => {
                console.log(response.data);
                setDataTenan(response.data.tenans); // Access the "tenans" array directly
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
                        <CCardHeader>Data Tenan</CCardHeader>
                        <CCardBody>
                            <CTable striped bordered responsive>
                                <CTableHead>
                                    <CTableRow>
                                        <CTableHeaderCell>Kode Kasir</CTableHeaderCell>
                                        <CTableHeaderCell>NamaTenan</CTableHeaderCell>
                                        <CTableHeaderCell>HP</CTableHeaderCell>
                                    </CTableRow>
                                </CTableHead>
                                <CTableBody>
                                    {dataTenan.map((tenan, index) => (
                                        <CTableRow key={index}>
                                            <CTableDataCell>{tenan.KodeTenan}</CTableDataCell>
                                            <CTableDataCell>{tenan.NamaTenan}</CTableDataCell>
                                            <CTableDataCell>{tenan.HP}</CTableDataCell>
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

export default KelolaTenan;
