import React, { useState, useEffect } from 'react'
import { useNavigate } from 'react-router-dom'
import axios from 'axios'
import Swal from 'sweetalert2'
import {
    CButton,
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
    CForm,
    CFormInput,
    CInputGroup,
} from '@coreui/react'
import CIcon from '@coreui/icons-react'
import { cilPen, cilTrash, cilSearch, cilUserPlus } from '@coreui/icons'
import { Link } from 'react-router-dom'

const KelolaBarang = () => {
    const [searchText, setSearchText] = useState('')
    const [dataBarang, setDataBarang] = useState([])
    const navigate = useNavigate()

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/barangs')
            .then((response) => {
                console.log(response.data)
                setDataBarang(response.data.barangs)
            })
            .catch((error) => {
                console.error('Error fetching data:', error)
            })
    }, [])

    function handleEdit(data) {
        // localStorage.setItem(
        //     'lsDataBarang',
        //     JSON.stringify({
        //         // id: data.id,
        //         // nama: data.nama,
        //         // username: data.username,
        //         // password: data.password,
        //     }),
        // )
        // navigate('/barang/update')
    }

    const handleDelete = (barang) => {
        Swal.fire({
            title: `Apakah anda yakin ingin menghapus ${barang.NamaBarang}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .delete(`http://localhost:8000/api/barangs/delete/${barang.KodeBarang}`)
                    .then((response) => {
                        Swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                        window.location.href = '/barang'
                    })
                    .catch((error) => {
                        console.error('Error deleting barang:', error)
                    })
            }
        })
    }

    return (
        <div>
            <CRow>
                <CCol>
                    <CCard>
                        <CCardHeader>Data Barang</CCardHeader>
                        <CCardBody>
                            <CForm className="mb-3">
                                <CRow>
                                    <CCol md={2} xs={4} className="text-end">
                                        <Link to="/barang/create">
                                            <CButton variant="outline">
                                                <CIcon icon={cilUserPlus} className="mx-2" />
                                                Tambah Barang
                                            </CButton>
                                        </Link>
                                    </CCol>
                                </CRow>
                            </CForm>
                            <CTable striped bordered responsive>
                                <CTableHead>
                                    <CTableRow>
                                        <CTableHeaderCell>Kode Barang</CTableHeaderCell>
                                        <CTableHeaderCell>Nama Barang</CTableHeaderCell>
                                        <CTableHeaderCell>Satuan</CTableHeaderCell>
                                        <CTableHeaderCell>Harga Satuan</CTableHeaderCell>
                                        <CTableHeaderCell>Stok</CTableHeaderCell>
                                        <CTableHeaderCell>Aksi</CTableHeaderCell>
                                    </CTableRow>
                                </CTableHead>
                                <CTableBody>
                                    {dataBarang.map((barang, index) => (
                                        <CTableRow key={index}>
                                            <CTableDataCell>{barang.KodeBarang}</CTableDataCell>
                                            <CTableDataCell>{barang.NamaBarang}</CTableDataCell>
                                            <CTableDataCell>{barang.Satuan}</CTableDataCell>
                                            <CTableDataCell>{barang.HargaSatuan}</CTableDataCell>
                                            <CTableDataCell>{barang.Stok}</CTableDataCell>
                                            <CTableDataCell>
                                                <CCol>
                                                    <CButton
                                                        color="primary"
                                                        variant="outline"
                                                        className="ms-2"
                                                        title="Edit Data Barang"
                                                        onClick={() => handleEdit(barang)}
                                                    >
                                                        <CIcon icon={cilPen} />
                                                    </CButton>
                                                    <CButton
                                                        color="danger"
                                                        variant="outline"
                                                        className="ms-2"
                                                        title="Hapus Data Barang"
                                                        onClick={() => handleDelete(barang)}
                                                    >
                                                        <CIcon icon={cilTrash} />
                                                    </CButton>
                                                </CCol>
                                            </CTableDataCell>
                                        </CTableRow>
                                    ))
                                    }
                                </CTableBody>
                            </CTable>
                        </CCardBody>
                    </CCard>
                </CCol>
            </CRow>
        </div>
    )
}

export default KelolaBarang
