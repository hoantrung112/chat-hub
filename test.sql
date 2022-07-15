SELECT * FROM messages 
                WHERE (incoming_msg_id = 534179096
                OR outgoing_msg_id = 534179096) AND (outgoing_msg_id = outgoing_msg_id 
                OR incoming_msg_id = outgoing_msg_id) 
                ORDER BY msg_id DESC 
                LIMIT 1;