### String
> Set value by key
```bash
set [key] [value]
```

> Get value by key
```bash
get [key]
```

> Set & Get value by key
```bash
getSet [key] [value]
```

> Get string length
```bash
strlen [key]
```

> Set multiple values
```bash
mset [key=value] [key=value] [key=value] [...]
```

> Get multiple values
```bash
mset [key-1] [key-2] [key-3] [key-n]
```

> Append value to string
```bash
set message Hello

append message World # HelloWorld
```

> Get range of string from start to end by index
```bash
set message Hello

getRange message 0 1 # He
```

> Delete value by key
```bash
del [key]
```

> Delete multiple values by keys
```bash
unlink [key-1] [key-2] [key-3] [key-n]
```

> Set expire-time for string
```bash
setex [key] [seconds] [value]
```

> Get current expire-time seconds to delete the value
```bash
setex [key]
```

> Check to exist value by key
```bash
exists [key]
```


### Number
> Increment number by key
```bash
set counter 5 # Init state

incr counter # Update the state => 5+1 = 6
```

> Decrement number by key
```bash
set counter 5 # Init state

decr counter # Update the state => 5-1 = 4
```

> Increment number with value
```bash
set counter 5 # Init state

incrBy counter 10 # Update the state => 5+10 = 15
```

> Decrement number with value
```bash
set counter 5 # Init state

decrBy counter 5 # Update the state => 5-5 = 0
```

### Hash
> Set new hash
```bash
hset [name] [key] [value]
```
> Set multiple hash data by key & value
```bash
hmset [name] [key:value] [key:value] [...]
```

> Get hash value by key
```bash
hget [name] [key]
```

> Get all hash data
```bash
hgetall [name]
```

> Get hash length
```bash
hlen [name]
```

> Get all hash keys
```bash
hkeys [name]
```

> Get all hash values
```bash
hvals [name]
```

> Get multiple hash values by keys
```bash
hvals [name] [key-1] [key-2] [key-3] [key-n]
```

> Delete hash value by key
```bash
hdel [name] [key]
```

> Check to exist hash value by key
```bash
hexists [name] [key]
```


### List
> Push values to list
```bash
lpush [name] [value]
```

> Pop value from the list by name
```bash
lpop [name]
```

> Get length of list by name
```bash
llen [name]
```

> Get value of list by index
```bash
llen [name] [index]
```

> Get range of list from start to end by name
```bash
llen [name] [start] [end]
```

> Remove value of list by index
```bash
lrem [name] [index]
```

> Set key & value to list by name
```bash
lset [name] [key] [value]
```

> Remove value of list at end of list
```bash
Rpop [name]
```

> Add new value of list at end of list
```bash
Rpush [name] [value]
```


### Store
> Get store
```bash
dump
```

> Get all store keys
```bash
keys
```

> Destroy the store
```bash
flushdb
```


### Session
> Terminate current session
```bash
quit
```


### General
> FUN!
```bash
ping
```