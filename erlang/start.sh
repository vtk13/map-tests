#!/bin/sh
rm -rf db
mkdir db

erlc bench.erl

erl -mnesia dir '"db"'
