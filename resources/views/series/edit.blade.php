<x-layout title="Editar serie {{ $nome }}">

    <x-form action="{{ route('series.update', $nome) }}" nome="{{ $nome }}" update="{{true}}"/>


</x-layout>
