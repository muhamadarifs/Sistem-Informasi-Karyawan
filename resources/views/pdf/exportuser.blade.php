<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
h1{
    text-align: center;
}
</style>
</head>
<body>

<h1>Data User</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>NIK</th>
    <th>Warga Negara</th>
    <th>Nama</th>
    <th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>Email</th>
    <th>Nomor telpon</th>
    <th>Alamat</th>
  </tr>
@foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->nik }}</td>
        <td>{{ $user->warga_negara }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->tgl_lahir }}</td>
        <td>{{ $user->jenis_kelamin }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->telp }}</td>
        <td>{{ $user->alamat }}</td>
    </tr>
@endforeach

</table>

</body>
</html>

