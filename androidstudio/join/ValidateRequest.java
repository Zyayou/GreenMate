package com.example.greenmate;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;
public class ValidateRequest extends StringRequest{
    //서버 url 설정(php파일 연동)
    final static  private String URL="http://192.168.1.6/UserValidate.php";
    private Map<String, String> map;

    public ValidateRequest(String m_id, Response.Listener<String> listener){
        super(Method.POST, URL, listener,null);

        map = new HashMap<>();
        map.put("m_id", m_id);
    }

    @Override
    protected Map<String, String> getParams() throws AuthFailureError {
        return map;
    }
}