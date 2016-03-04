# memcache-redis-benchmark

### Environment
- Local Vagrant 
- Intel(R) Core(TM) i5-5200U CPU @ 2.20GHz 
- CPU cores: 2
- Memory: 6 GB
- Redis Version: 3.0.7 
- Redis Client: predis/predis 1.0
- Memcached Version: 1.4.25 
- Memcached Client: PHP Memcached 2.2

| Test Cases        | Memcached           | Redis  |
| ------------- |:-------------:| -----:|
| Set 10000 times with string 5000 chars      | ~4s | ~62s |
| Get 10000 times with string 5000 chars      | ~4s | ~34s |
| Set 10000 times with string 100 chars | ~4s      |    ~4.6s ~4.8s (1250 chars) ~4.8s (1365 chars) ~4.9s (1374 chars) ~35s (1375 chars) ~51s (1500 chars)  | 
Get 10000 times with string 100 chars | ~3.8s | ~4.4s ~4.7s (1400 chars) | ~4.437s (1425 chars) ~4.8s (1439 chars) ~68s (1440 chars) ~60s (1450 chars) ~56s (1500 chars) |
Set 1000 times with json (job object) 5000 chars | ~6.8s | ~1.6s (hmset) ~3.4s (set, same usage as memcached) |
Get 1000 times with json (job object) 5000 chars | ~6.4s | ~1s (hgetall) ~3.4s (get, same usage as memcached) |
Get 1000 times with 1 field (position_title) | - | ~0.51s  (hget) |
Get 1000 times with 30 fields | - | ~0.72s (hmget) |
Get 1000 times with 20 fields | - | ~0.57s (hmget) |
Get 1000 times with 10 fields | - | ~0.51s (hmget) |
Update 1000 times with 1 field (position_title) | - | ~0.46s (hset) |
Update 1000 times with 10 fields | - | ~0.52s(hmset) |

| Test Cases (Pre-allocate >500K entries) | Memcached           | Redis  |
| ------------- |:-------------:| -----:|
Set 10000 times with string 5000 chars | ~4.1s | ~47s |
Get 10000 times with string 5000 chars | ~4s | ~34s |
Set 1000 times with json (job object) 5000 chars | ~5.5s | ~1.4s |
Get 1000 times with json (job object) 5000 chars | ~5.3s | ~0.92s | 
Memory used for 100K job object | 206M | 405.75M (set) 944.89M (hmset) |













