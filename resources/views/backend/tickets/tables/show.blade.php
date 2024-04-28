<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $ticket->id }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Faculty</td>
                    <td class="table-center">{{ $ticket->translation->faculty }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Department</td>
                    <td class="table-center">{{ $ticket->department }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Teacher</td>
                    <td class="table-center">{{ $ticket->teacher }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Student</td>
                    <td class="table-center">{{ $ticket->student }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Category</td>
                    <td class="table-center">{{ $ticket->category }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Type</td>
                    <td class="table-center">{{ $ticket->type }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Priority</td>
                    <td class="table-center">{{ $ticket->priority }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Message</td>
                    <td class="table-center">{{ $ticket->message }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.created_at')
                    </td>
                    <td class="table-center">{{ $ticket->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.updated_at')
                    </td>
                    <td class="table-center">{{ $ticket->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
