@extends('layouts.main-atleta')

@section('title', 'Área do Atleta')

@section('table')
  <table class="w-full">
    <thead class="bg-blue-700 text-white">
      <tr>
        <th class="p-3">Data do evento</th>
        <th class="p-3">Nome do evento</th>
        <th class="p-3">Ver certificado</th>
        <th class="p-3">Leia mais</th>
      </tr>
    </thead>
    <tbody>
      @foreach($torneio as $torneio)
        <tr class="odd:bg-gray-100 even:bg-gray-50">
          <td class="p-4">{{ date('d/m/Y', strtotime($torneio->data)) }}</td>
          <td class="p-4">{{ $torneio->titulo }}</td>
          <td class="p-4">
            <div class="flex justify-center">
              @if($torneio->fase == "Resultados")
              <a
                href="#"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
              >
                Certificado
              </a>
              @endif
            </div>
          </td>
          <td class="p-4">
            <div class="flex justify-center">         
              <a
                href="/site/integra/{{$torneio->id}}={{$torneio->titulo}}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
              >
                Detalhes do evento
              </a>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

