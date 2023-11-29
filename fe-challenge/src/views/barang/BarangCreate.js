import React, { useState } from 'react'
import Swal from 'sweetalert2'
import {
    CButton,
    CCard,
    CCardBody,
    CCardFooter,
    CCardHeader,
    CCol,
    CForm,
    CFormInput,
    CInputGroup,
    CRow,
    CSpinner,
} from '@coreui/react'
import { Link } from 'react-router-dom'

import axios from 'axios'
const BarangCreate = () => {
    const [message, setMessage] = useState('')
    const [loading, setLoading] = useState(false)
    const [formData, setFormData] = useState({
        kode_barang: '',
        nama_barang: '',
        satuan: '',
        harga_satuan: '',
        stok: '',
    })

    const handleSubmit = async (e) => {
        e.preventDefault()
        setLoading(true)
        const newBarang = {
            KodeBarang: formData.kode_barang,
            NamaBarang: formData.nama_barang,
            Satuan: formData.satuan,
            HargaSatuan: formData.harga_satuan,
            Stok: formData.stok,
        }
        console.log(newBarang)

        try {
            const response = await axios.post(
                'http://localhost:8000/api/barangs/create',
                newBarang,
            )
            Swal.fire({
                title: 'Berhasil',
                text: `Data barang berhasil ditambahkan.`,
                icon: 'success',
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/barang'
                    console.log('Barang created successfully:', response.data)
                }
            })
        } catch (error) {
            if (error.response && error.response.data && error.response.data.message) {
                const resMessage =
                    (error.response && error.response.data && error.response.data.message) ||
                    error.message ||
                    error.toString()
                setMessage(resMessage)
            }
            setLoading(false)
        }
    }
    return (
        <>
            <CCard>
                <CForm onSubmit={handleSubmit}>
                    <CCardHeader>Form Tambah Barang</CCardHeader>
                    <CCardBody>
                        <CRow>
                            <CCol xs={12}>
                                <CInputGroup className="mb-3">
                                    <CFormInput
                                        name="kode_barang"
                                        placeholder="Kode Barang"
                                        floatingLabel="Kode Barang"
                                        value={formData.kode_barang}
                                        required
                                        onChange={(e) => setFormData({ ...formData, kode_barang: e.target.value })}
                                    />
                                </CInputGroup>
                            </CCol>
                            <CCol xs={12}>
                                <CInputGroup className="mb-3">
                                    <CFormInput
                                        name="nama_barang"
                                        placeholder="Nama Barang"
                                        floatingLabel="Nama Barang"
                                        value={formData.nama_barang}
                                        required
                                        onChange={(e) => setFormData({ ...formData, nama_barang: e.target.value })}
                                    />
                                </CInputGroup>
                            </CCol>
                            <CCol xs={12}>
                                <CInputGroup className="mb-3">
                                    <CFormInput
                                        name="satuan"
                                        placeholder="Satuan"
                                        floatingLabel="Satuan"
                                        value={formData.satuan}
                                        required
                                        onChange={(e) => setFormData({ ...formData, satuan: e.target.value })}
                                    />
                                </CInputGroup>
                            </CCol>
                            <CCol xs={12}>
                                <CInputGroup className="mb-3">
                                    <CFormInput
                                        name="harga_satuan"
                                        placeholder="Harga Satuan"
                                        floatingLabel="Harga Satuan"
                                        value={formData.harga_satuan}
                                        required
                                        onChange={(e) =>
                                            setFormData({ ...formData, harga_satuan: e.target.value })
                                        }
                                    />
                                </CInputGroup>
                            </CCol>
                            <CCol xs={12}>
                                <CInputGroup className="mb-3">
                                    <CFormInput
                                        name="stok"
                                        placeholder="Stok"
                                        floatingLabel="Stok"
                                        value={formData.stok}
                                        required
                                        onChange={(e) =>
                                            setFormData({ ...formData, stok: e.target.value })
                                        }
                                    />
                                </CInputGroup>
                            </CCol>
                        </CRow>
                    </CCardBody>
                    <CCardFooter>
                        <CRow>
                            <CCol md={1}>
                                <Link to={`/roti`}>
                                    <CButton color="danger" variant="outline" className="ms-2" title="Back">
                                        Back
                                    </CButton>
                                </Link>
                            </CCol>
                            <CCol xs={1}>
                                {loading ? (
                                    <CButton color="primary" variant="outline" type="submit" disabled>
                                        <CSpinner color="info" size="sm" />
                                    </CButton>
                                ) : (
                                    <CButton color="primary" variant="outline" type="submit">
                                        Submit
                                    </CButton>
                                )}
                            </CCol>
                        </CRow>
                        <CRow className="mt-2">
                            {message && <p className="error-message alert alert-danger">{message}</p>}
                        </CRow>
                    </CCardFooter>
                </CForm>
            </CCard>
        </>
    )
}
export default BarangCreate
