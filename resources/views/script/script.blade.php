    <script>

            function dragFromToDo(ev) {
                ev.dataTransfer.setData("id", ev.target.id);
            }
            function dragFromProgress(ev) {
                ev.dataTransfer.setData("id", ev.target.id);
            }

            function allowDrop(ev) {
                ev.preventDefault();
            }

            function dropFromToDo(ev) {
                let url = "{{ route('in-progress', ':id') }}";
                url = url.replace(':id', ev.dataTransfer.getData("id"));
                document.location.href=url;
                ev.preventDefault();
                var data = ev.dataTransfer.getData("id");
                ev.target.appendChild(document.getElementById(data));
            }
            function dropFromProcess(ev) {
                let url = "{{ route('done', ':id') }}";
                url = url.replace(':id', ev.dataTransfer.getData("id"));
                document.location.href=url;
                ev.preventDefault();
                var data = ev.dataTransfer.getData("id");
                ev.target.appendChild(document.getElementById(data));
            }
     </script>