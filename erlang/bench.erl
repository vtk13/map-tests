-module(bench).
-compile(export_all).

-record(map, {id, x, y}).

start() ->
  mnesia:create_schema([node()]),
  mnesia:start(),
  mnesia:create_table(map, [{disc_copies, [node()]}, {attributes, record_info(fields, map)}]),
  ok.

bench(N) ->
  timer:tc(?MODULE, insert_items, [N]).

insert_item(0, _) ->
  ok;
insert_item(N, Base) ->
  Item = #map{id=N + Base, x=N, y=N},
  mnesia:write(Item),
  insert_item(N-1, Base).

insert_items(0) ->
  ok;
insert_items(N) ->
  mnesia:transaction(fun() ->
      insert_item(100, N * 100)
  end),
  insert_items(N-1).
