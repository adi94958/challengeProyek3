import React from 'react'

const Kasir = React.lazy(() => import('./views/kasir/KelolaKasir'))
const Barang = React.lazy(() => import('./views/barang/KelolaBarang'))
const BarangUpdate = React.lazy(() => import('./views/barang/BarangUpdate'))
const BarangCreate = React.lazy(() => import('./views/barang/BarangCreate'))
const Tenan = React.lazy(() => import('./views/tenan/KelolaTenan'))
const Nota = React.lazy(() => import('./views/nota'))
const NotaBarang = React.lazy(() => import('./views/notaBarang'))

const routes = [
  { path: '/', exact: true, name: 'Home' },
  { path: '/barang', name: 'Barang', element: Barang },
  { path: '/barang/update', name: 'Barang Update', element: BarangUpdate },
  { path: '/barang/create', name: 'Barang Create', element: BarangCreate },
  { path: '/kasir', name: 'Kasir', element: Kasir },
  { path: '/tenan', name: 'Tenan', element: Tenan },
  { path: '/nota', name: 'Nota', element: Nota },
  { path: '/nota-barang', name: 'Nota Barang', element: NotaBarang },
]

export default routes
