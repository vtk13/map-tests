-module(bench).
-compile(export_all).

-record(map, {id, x, y}).

start() ->
  mnesia:create_schema([node()]),
  mnesia:start(),
  mnesia:create_table(map, [{attributes, record_info(fields, map)}]),
  ok.

bench(N) ->
  timer:tc(?MODULE, insert_items, [N]).

insert_item(0) ->
  ok;
insert_item(N) ->
  Item = #map{id=N, x=N, y=N},
  mnesia:write(Item),
  insert_item(N-1).

insert_items(0) ->
  ok;
insert_items(N) ->
  mnesia:transaction(fun() ->
      insert_item(100)
  end),
  insert_items(N-1).
