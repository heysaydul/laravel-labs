<x-layout>
    <h1 class="text-3xl"></h1>

    <table>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact['title'] }}</td>
                <td>{{ $contact['value'] }}</td>
            </tr>
            
        @endforeach
    </table>
</x-layout>